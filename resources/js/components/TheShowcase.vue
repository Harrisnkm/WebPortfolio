<template>
    <section class="showcase">
        <div class="hKLogo">
                <v-img
                    src="img/Logo.svg"
                    href="/"
                    class="hkLogoImage"
                ></v-img>
            <div class="hKName">
                HARRY<br>
                KIM
            </div>
        </div>

        <div class="showcaseContainer">
            <div>
                <div class="heroText animate__animated animate__flipInX animate__delay-1.5s">
                    <h1 class="">Full Stack<br>
                        <span class="secondaryText">Developer</span></h1>
                </div>

                <div>
                    <ul class="siteLinks">
                        <li><a href="#theAbout">about</a></li>
                        <li><a href="#thePortfolio">code</a></li>
                        <li><a href="#journeyTimeline">journey</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </section>
</template>

<script>
    export default {
        name: "Showcase"
    }
</script>

<style lang="sass" scoped>

    @import '../../sass/app'

    .showcase
        background-color: $darkblue
        height: 100vh

        .hKLogo
            position: absolute
            top: 1.5em
            left: 1.5em
            display: flex


            .hkLogoImage
                transform: rotate(-20deg)

            .hKName
                font-family: 'Inconsolata', monospace
                -webkit-font-smoothing: antialiased
                font-weight: 400
                letter-spacing: .5rem
                text-transform: uppercase
                color: white
                font-size: 1.5em

                @include mQ(desktop)
                    font-size: 3em



        .showcaseContainer
            display: flex
            align-items: center
            justify-content: center
            background-color: $darkblue
            font-style: normal
            font-weight: bold
            text-align: center
            height: 100%
            font-family: 'Red Hat Display'


            .heroText
                color: white
                font-weight: bold
                font-size: 1.5rem

                @include mQ(desktop)
                    h1
                        font-size: 5rem


            .secondaryText
                color: $watermelon
                font-weight: bold

                @include mQ(desktop)
                    font-size: 5rem



        .siteLinks

            justify-content: center
            align-content: center
            color: white
            list-style-type: none
            position: relative
            top: 1rem
            line-height: 2rem

            @include mQ(desktop)
                line-height: 3rem
                display: inline
                position: relative
                top: 7vw
                left: 20vw

            li
                margin-top: .25em
                text-decoration: none
                font-size: 1.1rem

                @include mQ(desktop)
                    display: inline-block
                    font-size: 2.5rem
                    margin: 0 5px 0
                    padding: 0 1.5em 0




                a
                    color: white
                    text-decoration: none

                    &:hover, &:active
                        list-style-type: none
                        text-decoration: inherit
                        color: $watermelon
                        transition: color .2s ease-in



</style>
