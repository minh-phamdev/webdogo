/**
 * @OA\Schema(
 *     schema="ProductResponse",
 *     @OA\Property(property="message", type="string"),
 *     @OA\Property(
 *         property="data",
 *         ref="#/components/schemas/Product"
 *     )
 * )
 */
class ProductResponseSwagger {}
