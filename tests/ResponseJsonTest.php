<?php

use ResponseJson\ResponseJson;
use PHPUnit\Framework\TestCase;

class ResponseJsonTest extends TestCase
{
    /**
     * @covers \ResponseJson\ResponseJson::response
     */
    public function testResponseError()
    {
        $token = [
            'token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.' .
                'eyJhdWQiOiJ0ZXN0IiwiZXhwIjozMCwiaWF0I' .
                'joxNTYyMTcwOTIwLCJpc3MiOiJ0ZXN0Iiwic3' .
                'ViIjoiIn0=.wPdhZtjpyBjObFWbxPx33GNJpv' .
                'KHIznPV0GQ2NiQp5A=',
            'valid_until' => '2020-06-16 12:36:34',
        ];

        $start = microtime(true);
        $finish = $start - microtime(true);

        $responseJson = Mockery::mock(ResponseJson::class)->makePartial();
        $responseJson->shouldReceive('getProfiler')
            ->with($start)
            ->once()
            ->andReturn($finish);

        $helper = $responseJson->response(
            'requestid',
            $start,
            $token,
            [],
            'An unexpected error occurred, please try again later'
        );

        $response = [
            'response' => [],
            'profiler' => $finish,
            'jwt' => $token,
            'requestId' => 'requestid',
            'message' => 'An unexpected error occurred, please try again later',
        ];

        $this->assertEquals($response, $helper);
    }

    /**
     * @covers \ResponseJson\ResponseJson::response
     */
    public function testResponseSucess()
    {
        $token = [
            'token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.' .
                'eyJhdWQiOiJ0ZXN0IiwiZXhwIjozMCwiaWF0I' .
                'joxNTYyMTcwOTIwLCJpc3MiOiJ0ZXN0Iiwic3' .
                'ViIjoiIn0=.wPdhZtjpyBjObFWbxPx33GNJpv' .
                'KHIznPV0GQ2NiQp5A=',
            'valid_until' => '2020-06-16 12:36:34',
        ];

        $start = microtime(true);
        $finish = $start - microtime(true);

        $responseJson = Mockery::mock(ResponseJson::class)->makePartial();
        $responseJson->shouldReceive('getProfiler')
            ->with($start)
            ->once()
            ->andReturn($finish);

        $helper = $responseJson->response(
            'requestid',
            $start,
            $token,
            [
                'id' => 1,
            ],
            ''
        );

        $response = [
            'response' => [
                'id' => 1,
            ],
            'profiler' => $finish,
            'jwt' => $token,
            'requestId' => 'requestid',
        ];

        $this->assertEquals($response, $helper);
    }

    /**
     * @covers \ResponseJson\ResponseJson::responseDelete
     */
    public function testResponseDelete()
    {
        $responseJson = new ResponseJson;
        $helper = $responseJson->responseDelete();

        $this->assertEmpty($helper['response']);
    }

    /**
     * @covers \ResponseJson\ResponseJson::getProfiler
     */
    public function testGetProfilerWithoutStart()
    {
        $responseJson = new ResponseJson;
        $helper = $responseJson->getProfiler(0);

        $this->assertEquals(0, $helper);
    }

    /**
     * @covers \ResponseJson\ResponseJson::getProfiler
     */
    public function testGetProfiler()
    {
        $responseJson = new ResponseJson;
        $helper = $responseJson->getProfiler(microtime(true));

        $this->assertNotNull($helper);
        $this->assertIsFloat($helper);
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
}
