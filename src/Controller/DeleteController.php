<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Repository\ArticleRepository;

class DeleteController extends BaseController
{
    public function processRequest(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id']) && is_numeric($_POST['id'])) {
                $articleId = (int)$_POST['id'];

                $repository = new ArticleRepository();
                $deleted = $repository->delete($articleId);

                if ($deleted) {
                    header('Location: /update-list');
                    exit;
                } else {
                    http_response_code(404);
                    echo "coun't be deleted";
                }
            } else {
                http_response_code(400);
                echo "ID missing or unvalid";
            }
        } else {
            http_response_code(405);
            echo "method not autorised";
        }
    }
}
