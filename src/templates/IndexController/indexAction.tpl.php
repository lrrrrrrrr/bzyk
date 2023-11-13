<ul>
    <?php

    foreach ($blogs as $blog): ?>
        <li>
            <a
                href="/index/show?id=<?= (int)$blog->getId() ?>"
            ><?= clean($blog->getTitle()) ?></a>
            <br />
            [ <a
                href="/index/edit?id=<?= (int)$blog->getId() ?>"
            >Edit</a> ]
            [ <a
                href="/index/delete?id=<?= (int)$blog->getId() ?>"
            >Delete</a> ]
        </li>
    <?php endforeach; ?>
</ul>
