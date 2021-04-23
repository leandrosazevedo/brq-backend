<?php

namespace App\Models;

final class ResultModel{
    private $success;
    private $userMessage;
    private $devMessage;
    private $exception;

    public function getSuccess(): bool {
        return $this->success;
    }
    public function getUserMessage(): string {
        return $this->userMessage;
    }
    public function getDevMessage(): string {
        return $this->devMessage;
    }
    public function getException(): string {
        return $this->exception;
    }

    public function setSuccess(bool $success): ResultModel{
        $this->success = $success;
        return $this;
    }
    public function setUserMessage(string $userMessage): ResultModel{
        $this->userMessage = $userMessage;
        return $this;
    }
    public function setDevMessage(string $devMessage): ResultModel{
        $this->devMessage = $devMessage;
        return $this;
    }
    public function setException(string $exception): ResultModel{
        $this->exception = $exception;
        return $this;
    }

    public function toArray():array{
        $array = [
            'success' => $this->success,
            'userMessage' => $this->userMessage,
            'devMessage' => $this->devMessage
        ];
        if(!$this->success){
            $array['exception'] = $this->exception;
        }
        return $array;
    }

}