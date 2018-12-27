<template>
    <div class="card">
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
                               name="name"
                               :value="getOldValue('name')"
                               required autofocus
                        >
                        <div class="tags are-medium">
                            <span class="tag is-danger" v-for="message in getError('name')">{{ message }}</span>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label for="email" class="label">Email</label>
                    <div class="control">
                        <input id="email"
                               type="email"
                               class="input"
                               :class="(hasError('email')) ? ' is-danger' : ''"
                               name="email"
                               :value="getOldValue('email')"
                               required
                        >

                        <div class="tags are-medium">
                            <span class="tag is-danger" v-for="message in getError('email')">{{ message }}</span>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label for="password" class="label">Password</label>
                    <div class="control">
                        <input id="password"
                               type="password"
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
                    <label for="password-confirm" class="label">Confirm Password</label>
                    <div class="control">
                        <input id="password-confirm"
                               type="password"
                               class="input"
                               :class="(hasError('password-confirm')) ? ' is-danger' : ''"
                               name="password-confirm"
                               required
                        >
                    </div>
                </div>


                <div class="field">
                    <div class="control">
                        <button class="button is-link is-fullwidth" type="submit">Register</button>
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
            },
            decodedOldValues() {
                return JSON.parse(this.oldValues)
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

    transition: all 150ms ease-in-out;

    &:hover {
        background-color: $pink-700;
        color: $gray-100;
    }
}
</style>
