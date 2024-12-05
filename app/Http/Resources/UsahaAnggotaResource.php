<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsahaAnggotaResource extends JsonResource
{
    //define properti
public $status;
public $message;
public $resource;

public function __construct($status, $message, $resource)
{
    parent::__construct($resource);
    $this->status  = $status;
    $this->message = $message;
}

    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        if ($this->resource instanceof \Illuminate\Support\Collection || $this->resource instanceof \Illuminate\Pagination\LengthAwarePaginator) {
        return [
            'success'   => $this->status,
            'message'   => $this->message,
            // 'data'      => $this->resource
            'data' => $this->resource->map(function ($usaha) {
                return [
                    'id' => $usaha->id,
                    'nama_usaha' => $usaha->nama_usaha,
                    'waktu_operational' => $usaha->waktu_operational,
                    'lokasi_usaha' => $usaha->lokasi_usaha,
                    'nomor_usaha' => $usaha->nomor_usaha,
                    'deskripsi' => $usaha->deskripsi,
                    'owner' => $usaha->creator ? $usaha->creator->full_name : null,
                    'created_at' => $usaha->created_at,
                ];
            }),

        ];
    } else {
        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => [
                    'id' => $this->resource->id,
                    'nama_usaha' => $this->resource->nama_usaha,
                    'waktu_operational' => $this->resource->waktu_operational,
                    'lokasi_usaha' => $this->resource->lokasi_usaha,
                    'nomor_usaha' => $this->resource->nomor_usaha,
                    'deskripsi' => $this->resource->deskripsi,
                    'owner' => $this->resource->creator ? $this->resource->creator->full_name : null,
                    'created_at' => $this->resource->created_at,
            ],
        ];
    }
    }
}
