<?php

namespace App\Http\Controllers;

use App\Models\AsteroidsNeoWs;
use App\Models\NearEarthObject;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function welcome(): JsonResponse
    {
        $message = ['hello' => 'MacPaw Internship 2022!'];
        return response()->json($message);
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = NearEarthObject::where('is_hazardous', true)->get();
        return response()->json($data);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $acceptable = [true, false, 0, 1, '0', '1', 'false', 'true'];
        if ($request->has('hazardous') && in_array($request->hazardous, $acceptable, true)) {
            $data = NearEarthObject::select('*')->when($request->has('hazardous'), function ($query) use ($request) {
                return $query->where('is_hazardous', $request->boolean('hazardous'));
            })->orderBy('speed', 'DESC')->get();
        } else {
            $data = ['error_msg' => 'Request parameter can be only true or false.'];
        }

        return response()->json($data);
    }

    /**
     * @return JsonResponse
     * @throws GuzzleException
     */
    public function grab(): JsonResponse
    {
        $client = new Client();
        $url = 'https://api.nasa.gov/neo/rest/v1/feed?';
        $start_date = Carbon::now()->subDays(3)->format('Y-m-d');
        $end_date = Carbon::now()->format('Y-m-d');

        $query_params = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'api_key' => env('NASA_API_KEY', 'DEMO_KEY')
        ];

        $response = $client->request('GET', $url, ['query' => $query_params]);
        $data = json_decode($response->getBody()->getContents());

        if (!empty($data->near_earth_objects)) {
            foreach ($data->near_earth_objects as $asteroids_per_day) {
                foreach ($asteroids_per_day as $asteroid) {
                    $insert_item['date'] = $asteroid->close_approach_data[0]->close_approach_date;
                    $insert_item['reference'] = $asteroid->neo_reference_id;
                    $insert_item['name'] = $asteroid->name;
                    $insert_item['speed'] = $asteroid->close_approach_data[0]->relative_velocity->kilometers_per_hour;
                    $insert_item['is_hazardous'] = (bool) $asteroid->is_potentially_hazardous_asteroid;
                    AsteroidsNeoWs::updateOrCreate($insert_item);
                }
            }
        }

        return response()->json(['Count of Near-Earth Objects (Asteroids - NeoWs)' => $data->element_count]);
    }
}
