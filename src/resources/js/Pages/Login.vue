<template>
    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="bg-white p-8 rounded shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Login</h1>
            <form @submit.prevent="submitForm" class="space-y-4">
                <div>
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" v-model="email" id="email" name="email" class="w-full px-4 py-2 border rounded mt-2">
                </div>
                <div>
                    <label for="password" class="block text-gray-700">Hasło:</label>
                    <input type="password" v-model="password" id="password" name="password" class="w-full px-4 py-2 border rounded mt-2">
                </div>
                <div class="text-red-500" v-if="error">
                    Błędne dane logowania.
                </div>
                <button type="submit" class="w-full text-white py-2 rounded">Login</button>
            </form>
        </div>
        <div>
            <a :href="route('register')">Zarejstruj się</a>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: '',
            error: false,
        };
    },
    methods: {
        submitForm() {
            this.$post(route('authenticate'), {
                'email': this.email,
                'password': this.password
            })
            .then(e => {
                this.error = false;
                window.location = route('dashboard');
            })
            .catch(e => {
                this.error = true;
            });
        }
    }
};
</script>

<style scoped>

</style>
