<?php

declare(strict_types=1);

namespace Vlc;

use Vlc\Command\Command;

class Vlc
{
	private const VLC_URL = "/requests/status.xml";
	
	private string $username;
	
	private string $password;

	private string $host;
	
	public function __construct(string $username, string $password, string $host = 'http://localhost:8080')
	{
		$this->username = $username;
		$this->password = $password;
		$this->host = $host;
	}
	
	public function play(): void
	{
		$this->runCommand(Command::PLAY);
	}
	
	public function pause(): void
	{
		$this->runCommand(Command::PAUSE);
	}
	
	public function restart(): void
	{
		$this->runCommand(Command::RESTART);
	}

	public function seekTo(int $seconds): void
	{
		$this->runCommand(Command::SEEK_TO . $seconds);
	}
	
	private function runCommand(string $commandName): string
	{
		$ch = curl_init($this->host . self::VLC_URL . '?command=' . $commandName);
		curl_setopt($ch, CURLOPT_USERPWD, "{$this->username}:{$this->password}");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
}