<?php

/**
  * @OA\Get(
  *      path="/v1/entities/badaso_users",
  *      operationId="browseBadasoUsers",
  *      tags={"badaso_users"},
  *      summary="Browse Badaso Users",
  *      description="Returns list of Badaso Users",
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Get(
  *      path="/v1/entities/badaso_users/read?slug=badaso_users&id={id}",
  *      operationId="readBadasoUsers",
  *      tags={"badaso_users"},
  *      summary="Get Badaso Users based on id",
  *      description="Returns Badaso Users based on id",
  *      @OA\Parameter(
  *          name="id",
  *          required=true,
  *          in="path",
  *          @OA\Schema(
  *              type="integer"
  *          )
  *      ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Post(
  *      path="/v1/entities/badaso_users/add",
  *      operationId="addBadasoUsers",
  *      tags={"badaso_users"},
  *      summary="Insert new Badaso Users",
  *      description="Insert new Badaso Users into database",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"name":"Abc", "username":"Abc", "email":"Abc", "additionalInfo":"Abc", "avatar":"Abc", "phone":"Abc", "emailVerifiedAt":"2021-01-01T00:00:00.000Z", "password":"Abc", "rememberToken":"Abc", "lastSentTokenAt":"2021-01-01T00:00:00.000Z"},
  *                 ),
  *             )
  *         )
  *      ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Put(
  *      path="/v1/entities/badaso_users/edit",
  *      operationId="editBadasoUsers",
  *      tags={"badaso_users"},
  *      summary="Edit an existing Badaso Users",
  *      description="Edit an existing Badaso Users",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"name":"Abc", "username":"Abc", "email":"Abc", "additionalInfo":"Abc", "avatar":"Abc", "phone":"Abc", "emailVerifiedAt":"2021-01-01T00:00:00.000Z", "password":"Abc", "rememberToken":"Abc", "lastSentTokenAt":"2021-01-01T00:00:00.000Z"},
  *                ),
  *             )
  *         )
  *     ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Delete(
  *      path="/v1/entities/badaso_users/delete",
  *      operationId="deleteBadasoUsers",
  *      tags={"badaso_users"},
  *      summary="Delete one record of Badaso Users",
  *      description="Delete one record of Badaso Users",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="badaso_users",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="string", property="field", default="id"),
  *                         @OA\Property(type="integer", property="value", example="123"),
  *                     ),
  *                ),
  *             )
  *         )
  *     ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Delete(
  *      path="/v1/entities/badaso_users/delete-multiple",
  *      operationId="deleteMultipleBadasoUsers",
  *      tags={"badaso_users"},
  *      summary="Delete multiple record of Badaso Users",
  *      description="Delete multiple record of Badaso Users",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="badaso_users",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="string", property="field", default="ids"),
  *                         @OA\Property(type="{}", property="value", example="123,123"),
  *                     ),
  *                ),
  *             )
  *         )
  *     ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Put(
  *      path="/v1/entities/badaso_users/sort",
  *      operationId="sortBadasoUsers",
  *      tags={"badaso_users"},
  *      summary="Sort existing Badaso Users",
  *      description="Sort existing Badaso Users",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="badaso_users",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     example={{"id":"123", "name":"Abc", "username":"Abc", "email":"Abc", "additionalInfo":"Abc", "avatar":"Abc", "phone":"Abc", "emailVerifiedAt":"2021-01-01T00:00:00.000Z", "password":"Abc", "rememberToken":"Abc", "lastSentTokenAt":"2021-01-01T00:00:00.000Z", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z"}, {"id":"123", "name":"Abc", "username":"Abc", "email":"Abc", "additionalInfo":"Abc", "avatar":"Abc", "phone":"Abc", "emailVerifiedAt":"2021-01-01T00:00:00.000Z", "password":"Abc", "rememberToken":"Abc", "lastSentTokenAt":"2021-01-01T00:00:00.000Z", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z"}},
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="integer", property="id"), 
  *                         @OA\Property(type="string", property="name"), 
  *                         @OA\Property(type="string", property="username"), 
  *                         @OA\Property(type="string", property="email"), 
  *                         @OA\Property(type="string", property="additionalInfo"), 
  *                         @OA\Property(type="string", property="avatar"), 
  *                         @OA\Property(type="string", property="phone"), 
  *                         @OA\Property(type="string", property="emailVerifiedAt"), 
  *                         @OA\Property(type="string", property="password"), 
  *                         @OA\Property(type="string", property="rememberToken"), 
  *                         @OA\Property(type="string", property="lastSentTokenAt"), 
  *                         @OA\Property(type="string", property="createdAt"), 
  *                         @OA\Property(type="string", property="updatedAt"),
  *                     ),
  *                ),
  *             )
  *         )
  *     ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */