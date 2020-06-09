<template>
    <section class="siteFooter">

                <div class="siteFooterLinks">
                    <div>
                        <a href="https://www.linkedin.com/in/harrison-kim-34a025a0/" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <div>
                        <a href="https://github.com/Harrisnkm" target="_blank">
                            <i class="fab fa-github-alt"></i>
                        </a>
                    </div>
                    <div>
                        <a href="https://stackoverflow.com/users/12574425/hrskim" target="_blank">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>


                <div class="text-center copyright">
                    <strong>&copy{{ new Date().getFullYear() }} — HK Solutions LLC</strong>
                </div>



    </section>
</template>

<script>
    export default {
        name: "TheFooter"
    }
</script>

<style lang="sass" scoped>
    @import '../../sass/app'

    .siteFooter
        background-color: black !important
        width: 100vw
        height: auto
        color: white !important
        font-family: 'Red Hat Display'
        position: relative
        padding: 1.5em
        box-sizing: border-box


        .siteFooterLinks
            display: flex
            justify-content: space-around
            padding: 1.5em
            width: 100%
            box-sizing: border-box

            @include mQ(desktop)
                max-width: 50%
                margin: auto

    .fab
        display: inline-block
        color: white
        font-size: 1.5em
        vertical-align: top

        @include mQ(desktop)
            font-size: 2.2em

        &:hover
            color: $lightblue
            transition: color .3s


    .copyright
        @include mQ(desktop)
            font-size: 1.1em
            padding: 1em

</style>
