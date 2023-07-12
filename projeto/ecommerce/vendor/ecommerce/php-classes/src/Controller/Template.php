<?php


namespace Ecommerce\Controller;

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

	public function setTemplate(String $file, array $tamplate_data = []) {

		$this->template = $this->twig->load($file);

		$this->template->display($tamplate_data);

	}

}


?>