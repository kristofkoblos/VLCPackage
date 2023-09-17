<?php

declare(strict_types=1);

namespace Vlc\Command;

class Command
{
	public const PLAY = 'pl_play';
	
	public const PAUSE = 'pl_pause';
	
	public const RESTART = 'seek&val=0';

	public const SEEK_TO = 'seek&val=';
}