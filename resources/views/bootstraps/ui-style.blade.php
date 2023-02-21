<style>
    body {
        background-color: #f9f9fa
    }

    .flex {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto
    }

    @media (max-width: 991.98px) {
        .padding {
            padding: 1.5rem
        }
    }

    @media (max-width: 767.98px) {
        .padding {
            padding: 1rem
        }
    }

    .padding {
        padding: 5rem
    }

    .card {
        background: #fff;
        border-width: 0;
        border-radius: .25rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
        margin-bottom: 1.5rem
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(19, 24, 44, .125);
        border-radius: .25rem
    }

    .list-item {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word
    }

    .list-item.block .media {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0
    }

    .list-item.block .list-content {
        padding: 1rem
    }

    .w-40 {
        width: 40px !important;
        height: 40px !important
    }

    .avatar {
        position: relative;
        line-height: 1;
        border-radius: 500px;
        white-space: nowrap;
        font-weight: 700;
        border-radius: 100%;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        border-radius: 500px;
        box-shadow: 0 5px 10px 0 rgba(50, 50, 50, .15)
    }

    .avatar img {
        border-radius: inherit;
        width: 100%
    }

    .gd-primary {
        color: #fff;
        border: none;
        background: #448bff linear-gradient(45deg, #448bff, #44e9ff)
    }

    .flex {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto
    }

    .text-color {
        color: #5e676f
    }

    .text-sm {
        font-size: .825rem
    }

    .h-1x {
        height: 1.25rem;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical
    }

    .no-wrap {
        white-space: nowrap
    }

    .list-row .list-item {
        -ms-flex-direction: row;
        flex-direction: row;
        -ms-flex-align: center;
        align-items: center;
        padding: .75rem .625rem;
    }

    .list-item {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
    }

    .list-row .list-item > * {
        padding-left: .625rem;
        padding-right: .625rem;
    }

    .dropdown {
        position: relative;
    }

    a:focus, a:hover {
        text-decoration: none;
    }

    list-item {
        background: white;
    }
</style>