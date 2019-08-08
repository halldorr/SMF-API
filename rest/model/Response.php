<?php

class Response 
{
	private $success;
	private $httpStatusCode;
	private $messages = array();
	private $data;
	private $toCache = false;
	private $responseData = array();

	public function setSuccess($success)
	{
		$this->success = $success;
	}

	public function setHttpStatusCode($httpStatusCode)
	{
		$this->httpStatusCode = $httpStatusCode;
	}

	public function addMessage($message)
	{
		$this->messages[] = $message;
	}

	public function setData($data)
	{
		$this->data = $data;
	}

	public function toCache($toCache)
	{
		$this->toCache = $toCache;
	}

	public function send()
	{
		header('Content-type: application/json;charset=utf-8');

		if ($this->toCache == true)
		{
			header('Cache-control: max-age=60');
		}
		else
		{
			header('Cache-control: no-cache, no-store');
		}

		if (($this->success !== false AND $this->success !== true) OR !is_numeric($this->httpStatusCode))
		{
			http_response_code(500);

			$this->responseData['statusCode'] = 500;
			$this->responseData['success'] = false;
			$this->addMessage('Response creation error');
			$this->responseData['messages'] = $messages;
		}
		else
		{
			http_response_code($this->httpStatusCode);

			$this->responseData['statusCode'] = $this->httpStatusCode;
			$this->responseData['success'] = true;
			$this->responseData['messages'] = $this->messages;
			$this->responseData['data'] = $this->data;
		}

		echo json_encode($this->responseData);
	}
}