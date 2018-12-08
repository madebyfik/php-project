<main>
    <div class="container mt-5">
        <h1 class="text-center display-4">Contact</h1>

        <br>
            
        <form class="mt-3" action="#" method="POST">
            <fieldset>
                <legend>Formulaire de contact</legend>
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Mail</span>
                    </div>
                    <input type="mail" name="email" id="email" class="form-control" placeholder="usernames@example.fr" aria-label="Email">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Objet</span>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Question sur mon compte</option>
                        <option value="1">Bug</option>
                        <option value="2">Supprimer mon compte</option>
                        <option value="3">Autre</option>
                    </select>    
                </div>

                <div class="input-group">
                    <textarea placeholder="your message..." class="form-control" aria-label="With textarea"></textarea>
                </div>

                <br>

                <button type="submit" class="btn btn-warning">Envoyez</button>
            </fieldset>
        </form>

        
    </div>

</main>
        