<?php

namespace App\View;

use App\Core\BaseView;
use App\Core\FormView;
use App\Entity\Article;
use App\View\Part\FooterAddView;
use App\View\Part\HeaderAddView;

class FormArticleView extends FormView
{
    public function __construct(private ?Article $article = null) {}

    protected function content(): void
    {
?>      <section>
    <h1>Blaze Leon</h1>
    <div>
        <?= $this->article ? "Update" : "<h2>Share your thoughts</h2>" ?>
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
            <button type="submit"><?= $this->article ? "Update" : "Publish" ?></button>
        </form>
        </div>
        </section>
<?php

    }
}
