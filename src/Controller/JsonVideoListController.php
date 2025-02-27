<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

class JsonVideoListController implements Controller
{
    public function __construct(private VideoRepository $repository)
    {
        
    }

    public function processaRequisicao(): void
    {
        $videoList = array_map(function (Video $video): array {
            return [
                'title' => $video->title,
                'url' => $video->url,
                'file_path' => '/img/uploads/' . $video->getFilePath(),
            ];
        }, $this->repository->all());

        echo json_encode($videoList);
    }
}
