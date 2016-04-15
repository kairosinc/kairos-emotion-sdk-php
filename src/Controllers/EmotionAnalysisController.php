<?php
/*
 * KairosEmotionAPILib
 *
 * This file was automatically generated for kairos by APIMATIC BETA v2.0 on 01/15/2016
 */

namespace KairosEmotionAPILib\Controllers;

include_once ("src/APIException.php");
include_once ("src/APIHelper.php");
include_once ("src/Configuration.php");
include_once ("src/CustomAuthUtility.php");
include_once ("vendor/apimatic/unirest-php/src/Unirest/Unirest.php");


use KairosEmotionAPILib\APIException;
use KairosEmotionAPILib\APIHelper;
use KairosEmotionAPILib\Configuration;
use KairosEmotionAPILib\CustomAuthUtility;
use Unirest\Unirest;

class EmotionAnalysisController {

    /**
     * Create a new media object to be processed.
     * @param  string|null     $source     Optional parameter: The source URL of the media.
     * @return mixed response from the API call*/
    public static function createMedia ( $source = NULL ) {
        
        // return $source;
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/media';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'source' => $source,
            'timeout' => Configuration::$apiTimeout
        ));

        // //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        // //prepare headers
        $headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'Content-Type' => Configuration::$contentType,
            'app_id' => Configuration::$appId,  
            'app_key' => Configuration::$appKey
            
        );

        // //prepare API request
        $request = Unirest::post($queryUrl, $headers);

        //append custom auth authorization headers
        CustomAuthUtility::appendCustomAuthParams($request);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);


        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
        else {
            self::deleteMediaById($response->body->id);
            // echo "<pre>" . json_encode($response->body->frames, JSON_PRETTY_PRINT) . "</pre>";
            echo "<pre>" . json_encode($response->body->frames, JSON_PRETTY_PRINT) . "</pre>";
        }

    }
        
        
    /**
     * Delete media results. It returns the status of the operation.
     * @param  string     $id     Required parameter: The id of the media.
     * @return mixed response from the API call*/
    public static function deleteMediaById ( $id ) {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/media/{id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array ( 'id' => $id, ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'Content-Type' => Configuration::$contentType,
            'app_id' => Configuration::$appId,  
            'app_key' => Configuration::$appKey
        );

        //prepare API request
        $request = Unirest::delete($queryUrl, $headers);

        //append custom auth authorization headers
        // CustomAuthUtility::appendCustomAuthParams($request);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
        else {
            echo "Media ID Deleted";
        }
    }
        
}