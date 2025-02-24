<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class DeleteVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (empty($id)) {
            header('Location: /?sucesso=0');
            return;
        }

        $success = $this->videoRepository->remove($id);

        if ($success === false) {
            header('Location: /?sucesso=0');
        }

        header('Location: /?sucesso=1');
        

    }
}
