                <div class='tab-pane fade' id='contact-tab-pane' role='tabpanel' aria-labelledby='contact-tab' tabindex='0'>
                    <form class='row g-3 needs-validation' method='post' novalidate>
                        <div class='col-md-4 position-relative'>
                            <label for='name' class='form-label'>Nom</label>
                            <input type='text' class='form-control' id='name' name='name' required>
                        </div>
                        <div class='col-md-4 position-relative'>
                            <label for='nickname' class='form-label'>Prénom</label>
                            <input type='text' class='form-control' id='nickname' name='nickname' required>
                        </div>
                        <div class='col-md-4 position-relative'>
                            <label for='sex' class='form-label'>Sexe</label>
                            <select class='form-select' id='sex' name='sex' name='sex' required>
                                <option selected disabled>Choose...</option>
                                <option value='m'>Homme</option>
                                <option value='f'>Femme</option>
                                <option value='other'>Autre</option>
                            </select>
                        </div>
                        
                        <div class='col-md-4 position-relative'>
                            <label for='job' class='form-label'>Profession</label>
                            <input type='text' class='form-control' id='job' name='job' required>
                        </div>
                        <div class='col-md-4 position-relative'>
                            <label for='phone' class='form-label'>Telephone</label>
                            <input type='text' class='form-control' id='phone' name='phone' min-length='10' max-length='10' required>
                            <div class='invalid-feedback'>
                                Please choose a valid phone number.
                            </div>
                        </div>
                        <div class='col-md-4 position-relative'>
                            <label for='birth' class='form-label'>Date Naissance</label>
                            <input type='date' class='form-control' id='birth' name='birth' required>
                        </div>
                        
                        <div class='col-md-6 position-relative'>
                            <label for='address' class='form-label'>Adresse</label>
                            <input type='text' class='form-control' id='address' name='address' required>
                        </div>
                        <div class='col-md-3 position-relative'>
                            <label for='city' class='form-label'>Ville</label>
                            <input type='text' class='form-control' id='city' name='city' required>
                        </div>
                        <div class='col-md-3 position-relative'>
                            <label for='cp' class='form-label'>Code Postal</label>
                            <input type='text' class='form-control' id='cp' name='cp' min-length='5' max-length='5' required>
                            <div class='invalid-feedback'>
                                Please choose a valid zip.
                            </div>
                        </div>
                        <div class='col-md-12 position-relative'>
                            <label for='desc' class='form-label'>Description</label>
                            <textarea class='form-control' placeholder='Vas-y laisse une description mon gava' id='desc' name='desc' style='height: 100px'></textarea>
                        </div>
                        <div class='col-12'>
                            <button type='submit' class='btn btn-outline-success'>Envoi</button>
                        </div>
                    </form>
                </div>