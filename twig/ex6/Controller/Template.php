<?php

require_once './../vendor/autoload.php';



class Template {

	private $twig;
	private $loader;	
	private $template; 

	public function __construct(
		String $folderLoader,
		string $folderCache,
		bool $cache,
		bool $debug) {

		$this->loader = new \Twig\Loader\FilesystemLoader($folderLoader);
		$this->twig = new \Twig\Environment($this->loader, [
			'cache' => $folderCache,
			'cache' => $cache,
			'debug' => $debug
		]);

		$this->loader = new \Twig\Loader\FilesystemLoader($folderLoader);

		$this->twig->addExtension(new \Twig\Extension\DebugExtension());

	}

	public function setTemplate($file) {

		$this->template = $this->twig->load($file);

		$this->template->display();

	}

}


?>