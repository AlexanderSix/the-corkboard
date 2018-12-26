<template>
    <div class="card">
        <div class="card-header">
            <p>Register</p>
        </div>

        <div class="card-content">
            <form :action="submitRoute" method="POST">
                <div class="field">
                    <label for="name" class="label">Name</label>
                    <div class="control">
                        <input id="name"
                               type="text"
                               class="input"
                               <!--:class="('name' in errors) ? ' is-danger' : ''"-->
                               placeholder="Name"
                               name="name"
                               :value="oldValues.name"
                               required autofocus
                        >
                        {{ errors }}
                        <!--<span v-if="hasError('name')" class="invalid-feedback" role="alert">-->
                            <!--<strong>{{ getError('name') }}</strong>-->
                        <!--</span>-->
                    </div>
                </div>

                <!--<div class="field">-->
                    <!--<label for="email" class="label">Email</label>-->
                    <!--<div class="control">-->
                        <!--<input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required>-->

                        <!--@if ($errors->has('email'))-->
                        <!--<span class="invalid-feedback" role="alert">-->
                                                <!--<strong>{{ $errors->first('email') }}</strong>-->
                                            <!--</span>-->
                        <!--@endif-->
                    <!--</div>-->
                <!--</div>-->

                <!--<div class="field">-->
                    <!--<label for="password" class="label">Password</label>-->
                    <!--<div class="control">-->
                        <!--<input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" placeholder="Password" name="password" required>-->

                        <!--@if ($errors->has('password'))-->
                        <!--<span class="invalid-feedback" role="alert">-->
                                                <!--<strong>{{ $errors->first('password') }}</strong>-->
                                            <!--</span>-->
                        <!--@endif-->
                    <!--</div>-->
                <!--</div>-->

                <!--<div class="field">-->
                    <!--<label for="password-confirm" class="label">Confirm Password</label>-->
                    <!--<div class="control">-->
                        <!--<input id="password-confirm" type="password" class="input{{ $errors->has('password-confirm') ? ' is-danger' : '' }}" placeholder="Confirm Password" name="password-confirm" required>-->
                    <!--</div>-->
                <!--</div>-->


                <!--<div class="field">-->
                    <!--<div class="control">-->
                        <!--<button class="button is-link" type="submit">Register</button>-->
                    <!--</div>-->
                <!--</div>-->
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RegisterCard",
        props: ['errors', 'submitRoute', 'oldValues'],
        computed: {
            // hasError(key) {
            //     return key in errors
            // }
        },
        methods: {
            getError(key) {
                return errors.key
            }
        },
        data () {
            return {

            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
