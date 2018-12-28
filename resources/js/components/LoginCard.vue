<template>
    <div class="card">
        <div class="card-content">
            <form :action="submitRoute" method="POST">
                <input type="hidden" name="_token" :value="csrf" />

                <div class="field">
                    <label for="email" class="label">Email</label>
                    <div class="control">
                        <input type="email"
                               id="email"
                               class="input"
                               :class="(hasError('email')) ? ' is-danger' : ''"
                               name="email"
                               :value="getOldValue('email')"
                               required
                               autofocus
                        >

                        <div class="tags are-medium">
                            <span class="tag is-danger" v-for="message in getError('email')">{{ message }}</span>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label for="password" class="label">Password</label>
                    <div class="control">
                        <input type="password"
                               id="password"
                               class="input"
                               :class="(hasError('password')) ? ' is-danger' : ''"
                               name="password"
                               required
                        >

                        <div class="tags are-medium">
                            <span class="tag is-danger" v-for="message in getError('password')">{{ message }}</span>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-link is-fullwidth" type="submit">Login</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LoginCard",
        props: ['errors', 'submitRoute', 'oldValues'],
        computed: {
            csrf() {
                return window.csrfToken;
            },
            decodedErrors() {
                return JSON.parse(this.errors)
            },
            decodedOldValues() {
                return JSON.parse(this.oldValues)
            }
        },
        methods: {
            hasError(key) {
                if (typeof this.decodedErrors !== 'undefined') {
                    return typeof this.decodedErrors[key] !== 'undefined'
                }

                return false
            },
            getError(key) {
                if (typeof this.decodedErrors !== 'undefined') {
                    return this.decodedErrors[key]
                }

                return null
            },
            getOldValue(key) {
                if (typeof this.decodedOldValues !== 'undefined') {
                    return this.decodedOldValues[key]
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
@import '../../sass/variables';

.card {
    background-color: $gray-1000;
    border-radius: 15px;
}

.field {
    margin-bottom: 25px;
}

input.input {
    height: 50px;
}

button.button {
    background-color: $pink-300;
    border-radius: 10px;

    height: 50px;

    transition: all
}
</style>
