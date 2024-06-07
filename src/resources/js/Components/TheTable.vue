<script>
 export default {
     props: {
         fields: Array,
         data: Array,
     }
 }
</script>

<template>
    <table class="w-full text-sm text-left">
        <thead class="text-xs bg-purple">
            <tr>
                <th class="py-2 pl-[8px]" v-for="field in fields" :key="field">
                    {{ field }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in data" :key='item'>
                <td class="py-2 pl-[8px]" v-for="el in item" :key='el'>
                    <a class="underline" :href="el.destination" v-if="el.destination" target="_blank">
                        {{ el.value }}
                    </a>
                    <span v-else>
                        {{ el }}
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<style scoped>
tbody tr:nth-child(2n) {
    background: #ddd;
}

tbody tr:nth-child(2n+1) {
    background: #ccc;
}
</style>
