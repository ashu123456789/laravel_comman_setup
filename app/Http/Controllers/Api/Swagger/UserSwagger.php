<?php


// Get User Detail

/**
 * @OA\Get(
 *      path="/api/users",
 *      operationId="getusersList",
 *      tags={"User"},
 *      summary="Get list of users",
 *      description="Returns list of users",
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *       @OA\Response(response=400, description="Bad request"),
 *       security={{ "apiAuth": {} }}
 *     )
 *
 * Returns list of users
 */


// ---------------------------------------------------------------------------------------------------------------------
//  Update User Profile


/**
 * @OA\put(
 * path="/api/editUser",
 * summary="Edit User Detail",
 * description="Update by id",
 * operationId="update",
 * tags={"User"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"email"},
 *       @OA\Property(property="email", type="string", format="email", example="admin@gmail.com"),
 *    ),
 * ),
 *  @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
 *        )
 *     ),
 * security={{ "apiAuth": {} }}
 * )
 */


// ---------------------------------------------------------------------------------------------------------------------

// Delete User

/**
 * @OA\delete(
 * path="/api/deleteUser",
 * summary="Delete User",
 * description="Delete by token",
 * operationId="delete",
 * tags={"User"},
 *  @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
 *        )
 *     ),
 * security={{ "apiAuth": {} }}
 * )
 */
