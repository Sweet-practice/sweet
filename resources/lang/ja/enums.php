<?php

use App\Enums\PublishState;

return [
  PublishState::class => [
  	PublishState::activeUser => '会員',
  	PublishState::deleteUser => '退会済み',
  ],
];