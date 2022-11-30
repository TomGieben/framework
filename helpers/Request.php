<?php

class Request {
    public function __construct() {
        $this->setHttpRequestMethod();
        $this->setUriProperties();
        $this->setParameters();

        return $this->request();
    }

    protected function setHttpRequestMethod() {
        $this->httpRequestMethod = $this->validateHttpRequestMethod($_SERVER['REQUEST_METHOD']);
    }

    protected function setUriProperties() {
        $urlData = parse_url($_SERVER['REQUEST_URI']);
        $this->uriProperties = $urlData;
    }

    protected function validateHttpRequestMethod(string $method = '') {
        switch ($method) {
            case 'GET':
            case 'POST':
            case 'PUT':
            case 'DELETE':
            case 'HEAD':
                return $method;
                break;
            default:
                throw new InvalidArgumentException('Unexpected value.');
                break;
        }
    }

    protected function setParameters() {
        $this->parameters = $_REQUEST;
    }

    protected function request(): object {
        return (object)[
            'http_request_method' => (object)$this->httpRequestMethod,
            'uri_properties' => (object)$this->uriProperties,
            'parameters' => (object)$this->parameters,
        ];
    }
}