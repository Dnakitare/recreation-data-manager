<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use GuzzleHttp\Client;

class FacilityController extends Controller
{
    private $client;

    /**
     * Constructor for the class.
     *
     * Initializes the Guzzle HTTP client with the base URI and headers.
     * The base URI is set to 'https://ridb.recreation.gov/api/v1/' and the headers
     * include an 'apikey' with the value of the environment variable 'RIDB_API_KEY'.
     *
     * @return void
     */
    public function __construct() {
        $this->client = new Client([
            'base_uri' => 'https://ridb.recreation.gov/api/v1/',
            'headers' => ['apikey' => env('RIDB_API_KEY')],
        ]);
    }

    /**
     * Fetches facilities from the API and saves them to the database.
     *
     * This function sends a GET request to the 'facilities' endpoint of the API and retrieves the facilities data.
     * It then iterates over the 'RECDATA' array in the response and updates or creates a new Facility model instance
     * for each facility. The Facility model is updated if it already exists in the database, otherwise a new instance
     * is created. The attributes of the Facility model are set using the corresponding values from the facility data.
     *
     * After saving all the facilities, the function returns a JSON response with a success message.
     *
     * @return \Illuminate\Http\JsonResponse The JSON response with a success message.
     */
    public function fetchFacilities()
    {
        $response = $this->client->get('facilities');
        $facilities = json_decode($response->getBody(), true);

        foreach ($facilities['RECDATA'] as $facilityData) {
            Facility::updateOrCreate(
                [
                    'name' => $facilityData['FacilityName'],
                    'facility_id' => $facilityData['FacilityID'],
                    'latitude' => $facilityData['FacilityLatitude'],
                    'longitude' => $facilityData['FacilityLongitude'],
                    'type' => $facilityData['FacilityTypeDescription'],
                    'geojson' => $facilityData['GEOJSON'],
                ]
            );
        }

        return response()->json(['message' => 'Facilities fetched and saved successfully.']);
    }
}
