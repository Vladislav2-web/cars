<?php

namespace App\Notifications;

use App\Models\TestDrive;
use Illuminate\Notifications\Notification;

class TestDriveStatusChanged extends Notification
{
    public function __construct(public TestDrive $testDrive)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        if ($this->testDrive->status === 'approved') {
            $message = 'Ваша заявка на тест-драйв одобрена! Ждём вас ' . $this->testDrive->preferred_date->format('d.m.Y') . '.';
        } else {
            $message = 'К сожалению, ваша заявка на тест-драйв отклонена.';
        }

        if ($this->testDrive->admin_comment) {
            $message .= ' Комментарий: ' . $this->testDrive->admin_comment;
        }

        return [
            'test_drive_id' => $this->testDrive->id,
            'status' => $this->testDrive->status,
            'message' => $message,
        ];
    }
}