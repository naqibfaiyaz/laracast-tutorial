<template>
    <!-- Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus v-model="email">
                            <label for="inputEmail">Email address</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required v-model="password">
                            <label for="inputPassword">Password</label>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" v-model="remember" checked>
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" @click="attemptLogin()" :disabled="!isValidLoginForm">Sign in</button>
                        <hr class="my-4">
                        <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                        <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
</template>

<script>
    export default {
        data() {
            return {
                email: '',
                password: '',
                remember: true
                }        
            },
            methods:{
                isEmailValid() {
                    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
                    {
                        return true;
                    }
                        return false;
                },
                attemptLogin() {
                    axios.post('/login', {
                        email: this.email,
                        password: this.password,
                        remember: this.remember
                    }).then(resp =>{
                        location.reload();
                    }).catch(error => {
                        console.log(error);
                    })
                }
            },
            computed:{
                isValidLoginForm(){
                    return this.isEmailValid() && this.password;
                }
            }
    }
</script>
