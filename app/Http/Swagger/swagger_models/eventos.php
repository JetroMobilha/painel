<?php

/**
  * @OA\Get(
  *      path="/v1/entities/eventos",
  *      operationId="browseEventos",
  *      tags={"eventos"},
  *      summary="Browse Eventos",
  *      description="Returns list of Eventos",
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
  *      path="/v1/entities/eventos/read?slug=eventos&id={id}",
  *      operationId="readEventos",
  *      tags={"eventos"},
  *      summary="Get Eventos based on id",
  *      description="Returns Eventos based on id",
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
  *      path="/v1/entities/eventos/add",
  *      operationId="addEventos",
  *      tags={"eventos"},
  *      summary="Insert new Eventos",
  *      description="Insert new Eventos into database",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"categoriaId":"", "nome":"Abc", "status":"Abc", "dataInicio":"2021-01-01T00:00:00.000Z", "dataFim":"2021-01-01T00:00:00.000Z", "localizacao":"Abc", "descricao":"Abc", "userEventos":"", "autor":"Abc"},
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
  *      path="/v1/entities/eventos/edit",
  *      operationId="editEventos",
  *      tags={"eventos"},
  *      summary="Edit an existing Eventos",
  *      description="Edit an existing Eventos",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"categoriaId":"", "nome":"Abc", "status":"Abc", "dataInicio":"2021-01-01T00:00:00.000Z", "dataFim":"2021-01-01T00:00:00.000Z", "localizacao":"Abc", "descricao":"Abc", "userEventos":"", "autor":"Abc"},
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
  *      path="/v1/entities/eventos/delete",
  *      operationId="deleteEventos",
  *      tags={"eventos"},
  *      summary="Delete one record of Eventos",
  *      description="Delete one record of Eventos",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="eventos",
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
  *      path="/v1/entities/eventos/delete-multiple",
  *      operationId="deleteMultipleEventos",
  *      tags={"eventos"},
  *      summary="Delete multiple record of Eventos",
  *      description="Delete multiple record of Eventos",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="eventos",
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
  *      path="/v1/entities/eventos/sort",
  *      operationId="sortEventos",
  *      tags={"eventos"},
  *      summary="Sort existing Eventos",
  *      description="Sort existing Eventos",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="eventos",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     example={{"id":"123", "categoriaId":"", "nome":"Abc", "status":"Abc", "dataInicio":"2021-01-01T00:00:00.000Z", "dataFim":"2021-01-01T00:00:00.000Z", "localizacao":"Abc", "descricao":"Abc", "userEventos":"", "autor":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z"}, {"id":"123", "categoriaId":"", "nome":"Abc", "status":"Abc", "dataInicio":"2021-01-01T00:00:00.000Z", "dataFim":"2021-01-01T00:00:00.000Z", "localizacao":"Abc", "descricao":"Abc", "userEventos":"", "autor":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z"}},
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="integer", property="id"), 
  *                         @OA\Property(type="string", property="categoriaId"), 
  *                         @OA\Property(type="string", property="nome"), 
  *                         @OA\Property(type="string", property="status"), 
  *                         @OA\Property(type="string", property="dataInicio"), 
  *                         @OA\Property(type="string", property="dataFim"), 
  *                         @OA\Property(type="string", property="localizacao"), 
  *                         @OA\Property(type="string", property="descricao"), 
  *                         @OA\Property(type="string", property="userEventos"), 
  *                         @OA\Property(type="string", property="autor"), 
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