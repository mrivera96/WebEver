<?php

/**
 * Excepción personalizada para el envío de respuestas
 */
class ApiResponse {
    private $status;
    private $Message;
    private $content;

    public function __construct($status, $message, $content) {
        $this->status = $status;
        $this->Message = $message;
        $this->content = $content;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getMessage() {
        return $this->Message;
    }

    public function getContent() {
        return $this->content;
    }


    public function toArray() {
        $errorBody = array(
            "message" => $this->Message
        );
        return $errorBody;
    }
    public function toArray2() {
        $errorBody = array(
            "message" => $this->Message,
            "content" => $this->content
        );
        return $errorBody;
    }
}