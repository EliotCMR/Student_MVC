<!doctype html>
<html lang="fr">
<meta charset="utf-8">
<title><?= $title ?? 'Student' ?></title>
<link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
<link href="blog.css" rel="stylesheet">
<link rel="stylesheet" href="vue/css/style.css?v=1.2">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="icon" href="<?= $favicon ?? 'data:;base64,iVBORw0KGgo=' ?>">

<body>
    <div class="container">

        <head>
            <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4 pt-1">
                    </div>
                    <div class="col-4 text-center">
                        <a href="index.php?table=Tag">Tag</a>
                        <a href="index.php?table=project">Project</a>
                        <a href="index.php?table=student">Student</a>
                    </div>

                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <a class="link-secondary" href="#" aria-label="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
                                <title>Search</title>
                                <circle cx="10.5" cy="10.5" r="7.5" />
                                <path d="M21 21l-5.2-5.2" />

                            </svg>
                        </a>
                        <form class="col-12 col-lg-auto mb-3 mb-lg-0">
                            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                        </form>
                    </div>

                </div>
    </div>
    </head>