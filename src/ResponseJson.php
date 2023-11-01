<?php

namespace ResponseJson;

class ResponseJson
{
    /**
     * Prepare JSON response
     *
     * @param string $requestId
     * @param float $start
     * @param string $token
     * @param array $data
     * @param string $message
     * @return array
     */
    public function response(
        string $requestId,
        float $start,
        ?array $token,
        array $data = [],
        string $message = ''
    ): array {
        $profiler = $this->getProfiler($start);

        $response = [
            'data' => $data,
            'profiler' => $profiler,
            'token' => $token,
            'requestId' => $requestId,
        ];

        if (!empty($message)) {
            $response['message'] = $message;
        }

        return $response;
    }

    /**
     * Prepare 204 delete response
     * @return array
     */
    public function responseDelete(): array
    {
        $response = [
            'data' => [],
        ];
        return $response;
    }

    /**
     * Get profile count
     * @param float $start
     * @return float
     */
    public function getProfiler(
        float $start
    ): float {
        if (empty($start)) {
            return 0;
        }

        $finish = microtime(true);
        return ($finish - $start);
    }
}
