<main>

    <?php
    if (isset($_GET['message']) && isset($_GET['type_message'])) {
        echo '<div class="alert   mx-5 alert-' . $_GET['type_message'] . ' alert-dismissible fade show" role="alert">
    <strong>' . $_GET['message'] . '</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

    ?>
<?php  ?>

    <div id="creation-form" class="container">
<form action="handlers/evnt_creation_handler.php" method="POST">
            <div class="row d-flex  justify-content-between  ">
                <!--Title box-->
                <div class="mb-4 mb-lg-4 col-12 offset-0 col-lg-8 offset-lg-2 order-lg-0">
                    <div id="title-box" class="px-5 py-2 pb-3 box--yellow fs-5">
                        <label for="input-title" class="form-label ">Nom de votre Evnt</label>
                        <input type="title" class="form-control" name="title" id="input-event-title"
                            aria-describedby="title">
                    </div>
                </div>

                <div id="date-adress-box" class="col-lg-4">
                    <!--Date box  1xs-->
                    <div class="mb-5 mb-lg-4 col-12  order-1   ">
                        <div id="date-box" class="px-3 py-3  box--yellow fs-5">
                            <label for="input-date" class="form-label "><i class="fa-regular fa-calendar-xmark"></i>
                                Quand
                                aura lieu votre EVNT ? </label>
                            <input type="date" class="form-control mb-2" id="input-event-date" name="date"
                                aria-describedby="date">
                            <input type="time" class="form-control w-50" name="time" id="hour" aria-describedby="hour">
                        </div>
                    </div>
                    <!--Adress box  2xs-->
                    <div class="mb-5 mb-lg-4 col-12 order-2">
                        <div id="adress-box" class="px-3 py-3  box--yellow  fs-5">
                            <div class="row">
                                <label for="adresse"> <i class="fa-regular fa-map mb-3"></i> Renseignez
                                    l'adresse<span data-toggle="tooltip" data-placement="top"
                                        title="Seules les personnes que vous acceptez dans l'EVNT pourront voir l'adresse précise si vous déclarez l'adresse privée. Il est fortement conseillé de déclarer l'adresse comme privée si vous organisez un EVNT à domicile. Si vous cochez privée, les personnes intéressés par l'EVNT verront le secteur dans lequel votre EVNT prend lieu, mais pas l'adresse précise avant d'être accepté dans l'EVNT.">
                                        <i class="fas fa-info-circle"></i>
                                    </span></label>
                                <div class="col-12 col-md-10 col-lg-8 ">
                                    <input type="text" class="form-control" id="adresse" name="adress">
                                </div>
                                <div class="col-12 col-md-2 col-lg-4 "> <input type="checkbox"
                                        class="form-check-input mt-2" id="private-adress">
                                    <label class="form-check-label mt-1" for="private-adress">Privée</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="participants-price-box"
                    class="col-lg-4 d-lg-flex flex-column-reverse justify-content-between  ">
                    <!--Participants box  3xs-->
                    <div class="mb-5 mb-lg-4 col-12 mx-lg-4 align-self-baseline order-3">

                        <div id="participants-box" class="px-3 py-3  box--yellow fs-5 w-100">
                            <label for="nombreParticipants"><i class="fa-solid fa-user-group  mb-3"></i> Nombre de
                                participants</label>
                            <div class="row d-flex align-items-stretch" id="participant-content">
                                <div class="form-group col-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control mt-2" id="nombreParticipants"
                                            name="nbplace" value="0">

                                        <div class="col-2">
                                            <span class="participant__number row align-items-baseline ">
                                                <span class="input-group-btn ">
                                                    <button type="button" class="participant__number-button"
                                                        id="btnPlus"><i class="fa-solid fa-plus"></i></button>
                                                </span>
                                                <span class="input-group-btn">
                                                    <button type="button" class="participant__number-button"
                                                        id="btnMinus"><i class="fa-solid fa-minus"></i></button>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9  text-end ">
                                    <div class="row">

                                        <div class="col-12">
                                            <input type="checkbox" class="form-check-input" id="partipant-is-free"
                                                name="isFree">
                                            <label class="form-check-label" for="partipant-is-free">Entrée Libre
                                                <span data-toggle="tooltip" data-placement="top" title="info">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>

                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--Price box   5xs-->
                    <div class="mb-5 mb-lg-0 col-12 order-5">
                        <div id="price-box" class="px-3 pt-3  mx-lg-4 mt-lg-0 mb-lg-0 box--yellow  fs-5 w-100">
                            <div class="row ">
                                <label for="price" class="mb-3"> <i class="fa-solid fa-sack-dollar"></i> Renseignez
                                    le coût<span data-toggle="tooltip" data-placement="top" title="title">
                                        <i class="fas fa-info-circle"></i>
                                    </span></label>
                                <div class="col-12 col-md-7 ">
                                    <input type="number" class="form-control" id="price" name="price">
                                    <!-- <input type="text" class="form-control" id="price" name="priceInfo"
                                            placeholder="ex: prévoir 7euros pour la place de ciné"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Category box   4xs-->
                <div class="mb-5 mb-lg-4 col-12 col-lg-4 order-4 d-lg-flex justify-content-end  ">
                    <div id="category-box" class="p-4 py-3  box--yellow fs-5 container-fluid ms-lg-5 ">
                        <div class="row">
                            <label for="categories" class="col-12 pb-3"><i class="fa-solid fa-rectangle-list"></i>
                                Catégories</label>
                            <select id="categories" name="category" class="form-select col-12"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <?php foreach ($categories as $category): ?>
                                    <?php echo '<option value="' . $category['idCategory'] . '">' . $category['name'] . '</option>'; ?>
                                <?php endforeach; ?>
                            </select>

                            <ul class="category-list"></ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  justify-content-between">
                <!--Description box   6xs-->
                <div class=" col-12 col-lg-5 d-lg-flex mb-5 mb-lg-0">
                    <div id="description-box" class="px-3 pt-3  box--yellow fs-5 ">
                        <label for="description"><i class="fa-solid fa-pencil pb-3"></i> Description</label>
                        <div class="input-group">
                            <input name="description" class="form-control pb-2" aria-label="textarea description"
                                placeholder="Un EVNT est plus marrant à plusieurs. Un bon résumé augmentera sûrement le taux de participation"></textarea>
                        </div>
                    </div>
                </div>
                <div id="picture-submit-box" class="col-lg-5">
                    <!--Picture box 7xs-->
                    <div class="mb-4 col-12 mb-5 mb-lg-3 ">
                        <div id="picture-box" class="px-3 py-3  box--yellow fs-5 w-100">
                            <label for="price"><i class="fa-solid fa-pencil "></i> Choisissez votre image</label>

                        </div>
                    </div>
                    <!--Submit box  8xs-->
                    <div class="col-12 align-items-center">
                        <div id="submit-box" class=" submit-box-evnt p- px-  box--yellow fs-1 w-100">
                            <button type="submit" class=" w-100  evnt-confirm-button">Créer votre Evnt</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>