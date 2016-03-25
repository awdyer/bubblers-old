<template>
<div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <bubbler-card
                    v-for="bubbler in bubblers"
                    :bubbler="bubbler">
            </bubbler-card>
        </div>
    </div>
</div>
</template>

<script type="text/babel">
    import BubblerCard from './BubblerCard';
    import bubblers from './bubblers';

    export default {
        data() {
            return {
                bubblers: []
            };
        },
        components: { BubblerCard },
        created() {
            bubblers.fetchAll()
                .then(res => {
                    this.bubblers = res.data.data;
                });
        }
    };
</script>