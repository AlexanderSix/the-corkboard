<template>
    <div class="card">
        <div class="card-header">
            <p>Register PLZ</p>
        </div>

        <div class="card-content">
            <form :action="submitRoute" method="POST">
                <input type="hidden" name="_token" :value="csrf" />

                <div class="field">
                    <label for="name" class="label">Name</label>
                    <div class="control">
                        <input id="name"
                               type="text"
                               class="input"
                               :class="(hasError('name')) ? ' is-danger' : ''"
                               placeholder="Name"
                               name="name"
                               :value="getOldValue('name')"
                               required autofocus
                        >
                        {{ errors }}
                        <span v-if="hasError('name')" class="invalid-feedback" role="alert">
                            <strong>{{ getError('name') }}</strong>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label for="email" class="label">Email</label>
                    <div class="control">
                        <input id="email"
                               type="email"
                               class="input"
                               :class="(hasError('email')) ? ' is-danger' : ''"
                               placeholder="Email"
                               name="email"
                               :value="getOldValue('email')"
                               required
                        >

                        <span v-if="hasError('email')" class="invalid-feedback" role="alert">
                            <strong>{{ getError('email') }}</strong>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label for="password" class="label">Password</label>
                    <div class="control">
                        <input id="password"
                               type="password"
                               class="input"
                               :class="(hasError('password')) ? ' is-danger' : ''"
                               placeholder="Password"
                               name="password"
                               required
                        >

                        <span v-if="hasError('password')" class="invalid-feedback" role="alert">
                            <strong>{{ getError('password') }}</strong>
                        </span>

                    </div>
                </div>

                <div class="field">
                    <label for="password-confirm" class="label">Confirm Password</label>
                    <div class="control">
                        <input id="password-confirm"
                               type="password"
                               class="input"
                               :class="(hasError('password-confirm')) ? ' is-danger' : ''"
                               placeholder="Confirm Password"
                               name="password-confirm"
                               required
                        >
                    </div>
                </div>


                <div class="field">
                    <div class="control">
                        <button class="button is-link" type="submit">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RegisterCard",
        props: ['errors', 'submitRoute', 'oldValues'],
        computed: {
            csrf() {
                return window.csrfToken;
            },
            decodedErrors() {
                return JSON.parse(this.errors)
            }
        },
        methods: {
            hasError(key) {
                console.log(this.decodedErrors)
                if (typeof this.decodedErrors !== 'undefined') {
                    console.log("HAS ERROR FOR KEY: " + key + " => " + this.decodedErrors[key])
                    return typeof this.decodedErrors[key] !== 'undefined'
                }

                return false
            },
            getError(key) {
                if (typeof this.decodedErrors !== 'undefined') {
                    console.log("GET ERROR " + this.decodedErrors[key])
                    return this.decodedErrors[key]
                }

                return null
            },
            getOldValue(key) {
                if (typeof this.oldValues !== 'undefined') {
                    return this.oldValues[key]
                } else {
                    return null
                }
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
