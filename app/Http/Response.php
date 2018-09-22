<?php

namespace App\Http;

use App\Entities\Entity;
use App\ValueObjects\TypedCollection;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;
use Illuminate\Http\JsonResponse as BaseResponse;

/**
 * Class Response
 * @package App\Http
 */
class Response
{
    /** @var Manager */
    private $fractal;

    public function __construct(Manager $fractal)
    {
        $this->fractal = $fractal;
    }

    public function collection(TypedCollection $data, TransformerAbstract $transformer) : BaseResponse
    {
        $resources = new Collection($data, $transformer);

        return BaseResponse::create(
            $this->fractal->createData($resources)->toArray()
        );
    }

    public function item(Entity $data, TransformerAbstract $transformer) : BaseResponse
    {
        $resource = new Item($data, $transformer);

        return BaseResponse::create(
            $this->fractal->createData($resource)->toArray()
        );
    }
}