<form action="/index/edit?id=<?= (int)$blog->getId() ?>" method="post">
    <input
        type="hidden" name="id"
        value="<?= (int)$blog->getId() ?>"
    />
    <input
        type="text" name="title" id="title" placeholder="Title"
        value="<?= clean($blog->getTitle()) ?>"
    />
    <input
        type="text" name="content" id="content" placeholder="Content"
        value="<?= clean($blog->getContent()) ?>"
    />
    <input type="submit" name="save" value="save" />
</form>
