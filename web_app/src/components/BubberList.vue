<template>
    <div>
        <bubbler-panel
                v-for="bubbler in bubblers"
                :bubbler="bubbler">
        </bubbler-panel>
    </div>
</template>

<script>
    import BubblerPanel from './BubblerPanel';

    export default {
        data() {
            return {
                bubblers: []
            }
        },
        components: { BubblerPanel },
        created() {
            this.$http.get('http://localhost:8000/api/bubblers?limit=10')
                .then(function(res) {
                    console.log(res);
                    this.bubblers = res.data.data;
                }, function(res) {
                    console.log(res);
                });
        }
    };
</script>