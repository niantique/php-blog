<?php

namespace App\View;

use App\Core\FormView;
use App\Entity\Article;

class FormArticleView extends FormView
{
    private ?Article $article;
    private ?string $errorMsg;
    public function __construct(?Article $article = null, ?string $errorMsg = null) {
        $this->article = $article;
        $this->errorMsg = $errorMsg;
    }

    protected function content(): void
    { if ($this->errorMsg) {
        echo "<p class='error'>{$this->errorMsg}</p>";
    }
?>      <section>
    <h1>Blaze Leon</h1>
    <div>
        <?= $this->article ? "<h2>Update</h2>" : "<h2>Share your thoughts</h2>" ?>
        <form method="post" enctype="multipart/form-data">
            <label>Car Model<br>
            <input type="text" name="car_model" value="<?= htmlspecialchars($this->article?->getCar()?->getModel() ?? "") ?>">
            </label>
              <label>Car Year
                <input type="text" name="car_year" value="<?= htmlspecialchars($this->article?->getCar()?->getYear() ?? "") ?>">
            </label>
            <label>Car Brand Name
                <input type="text" name="car_brand_name" value="<?= htmlspecialchars($this->article?->getCar()?->getBrand()->getName() ?? "") ?>">
            </label><br>
           <label>Car Brand origin
                <input type="text" name="car_brand_origin" value="<?= htmlspecialchars($this->article?->getCar()?->getBrand()->getOrigin() ?? "") ?>">
            </label><br>
             <label>Car Brand Description
                <input type="text" name="car_brand_description" value="<?= htmlspecialchars($this->article?->getCar()?->getBrand()->getDescription() ?? "") ?>">
            </label><br>
            <label>Author<br>
                <input type="text" name="author" value="<?= htmlspecialchars($this->article?->getAuthor() ?? "") ?>">
            </label><br>
            <label>Text<br>
                <textarea name="text"><?= htmlspecialchars($this->article?->getText() ?? "") ?></textarea>
            </label><br>
            <label>Image<br>
                <input type="text" name="image" value="<?= htmlspecialchars($this->article?->getImage() ?? "") ?>">
            </label><br>
            <button type="submit"><?= $this->article ? "Update" : "Publish" ?></button>
        </form>
        </div>
        </section>
<?php

    }
}
