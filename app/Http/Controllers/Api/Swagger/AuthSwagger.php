<?php

// ----------------------------------------------------------------------------------------------

// Login 

/**
 * @OA\Post(
 * path="/api/login",
 * summary="Sign in",
 * description="Login by email, password",
 * operationId="authLogin",
 * tags={"Auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"email","password"},
 *       @OA\Property(property="email", type="string", format="email", example="admin@gmail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="12345678"),
 *       @OA\Property(property="persistent", type="boolean", example="true"),
 *    ),
 * ),
 *  @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 * @OA\Response(
 *    response=401,
 *    description="Unauthorized User",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
 *        )
 *     )
 * )
 */


// --------------------------------------------------------------------------------------------------------------------
// Register SignUp

/**
 * @OA\Post(
 * path="/api/register",
 * summary="Signup",
 * description="Signup new user",
 * operationId="authSignup",
 * tags={"Auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 * @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *             required={"image","name","email","password"},
 *                 @OA\Property(description="image to upload", property="image", type="file"),
 *              @OA\Property(property="name", type="string", format="name", example="abc xyz"),
 *              @OA\Property(property="email", type="string", format="email", example="abc@gmail.com"),
 *              @OA\Property(property="password", type="string", format="password", example="12345678"),
 *             )
 *         ),
 *    @OA\JsonContent(
 *       required={"name","email","password"},
 *       @OA\Property(property="name", type="string", format="email", example="abc xyz"),
 *       @OA\Property(property="email", type="string", format="email", example="abc@gmail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="12345678"),
 *       @OA\Property(property="persistent", type="boolean", example="true"),
 *    ),
 * ),
 *  @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 * @OA\Response(
 *    response=401,
 *    description="Unauthorized User",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
 *        )
 *     )
 * )
 */



//  --------------------------------------------------------------------------------------------------------------------

// Logout User


/**
 * @OA\get(
 * path="/api/logout",
 * summary="Logout ",
 * description="logout by token",
 * operationId="logout",
 * tags={"Auth"},
 *  @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 * @OA\Response(
 *    response=401,
 *    description="Unauthorized User",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
 *        )
 *     ),
 * security={{ "apiAuth": {} }}
 * )
 */
