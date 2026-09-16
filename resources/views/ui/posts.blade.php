@extends('ui.layout')

@section('title')
Posts Feed
@endsection

@section('content')
<header class="ui-nav">
    <div class="ui-nav-in">
        <a class="ui-brand" href="/ui/companies">
            <span class="ui-brand-mark">W</span>
            Wazify
        </a>
        <span class="p-admin-pill">
            <i class="fa-solid fa-shield-halved"></i>
            Admin
        </span>
        <span class="ui-spacer"></span>
        <a class="ui-btn-green" href="#">
            <i class="fa-solid fa-plus"></i>
            Create Post
        </a>
        <a class="p-icon-btn" href="#">
            <i class="fa-regular fa-bell"></i>
            <span class="p-dot">3</span>
        </a>
        <a class="p-icon-btn" href="#">
            <i class="fa-regular fa-circle-question"></i>
        </a>
        <span class="p-avatar">
            <i class="fa-solid fa-user"></i>
        </span>
        <span class="p-who">
            <b>Admin</b>
            <small>Super Administrator</small>
        </span>
        <i class="fa-solid fa-chevron-down p-chev"></i>
    </div>
</header>

<div class="p-wrap">
    <div class="p-panel">
        <div class="p-head">
            <div>
                <h1>Posts Feed</h1>
                <p>Manage and moderate posts across the Wazify platform</p>
            </div>
            <div class="p-head-actions">
                <button class="c-drop">
                    <i class="fa-solid fa-filter"></i>
                    All Posts
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <button class="c-drop">
                    <i class="fa-solid fa-rotate-right"></i>
                    Refresh
                </button>
            </div>
        </div>

        @foreach ($posts as $post)
        <article class="p-card">
            <div class="p-card-in">
                <div class="p-top">
                    <span class="p-pav {{ $post['avatar_class'] }}">
                        @if ($post['avatar_icon'])
                        <i class="{{ $post['avatar_icon'] }}"></i>
                        @endif
                        @if ($post['avatar_letter'])
                        {{ $post['avatar_letter'] }}
                        @endif
                    </span>
                    <div>
                        <div class="p-name">
                            {{ $post['name'] }}
                            @if ($post['verified'])
                            <i class="fa-solid fa-circle-check p-verified"></i>
                            @endif
                        </div>
                        <div class="p-meta">
                            {{ $post['meta'] }}
                            <span class="p-badge {{ $post['badge_class'] }}">{{ $post['badge'] }}</span>
                        </div>
                    </div>
                    <div class="p-right">
                        <a class="p-del" href="#">
                            <i class="fa-solid fa-trash-can"></i>
                            Delete
                        </a>
                        <span class="p-comp">
                            <i class="fa-solid fa-building"></i>
                            {{ $post['company'] }}
                        </span>
                    </div>
                </div>

                <div class="p-body">
                    @foreach ($post['lines'] as $line)
                    <p class="p-line">{{ $line }}</p>
                    @endforeach
                </div>

                @if ($post['attachment_file'])
                <div class="p-file">
                    <i class="fa-solid fa-file-lines"></i>
                    <div>
                        <b>{{ $post['attachment_title'] }}</b>
                        <small>{{ $post['attachment_sub'] }}</small>
                    </div>
                    <i class="fa-solid fa-download p-dl"></i>
                </div>
                @endif

                @if ($post['attachment_link'])
                <div class="p-file">
                    <i class="fa-solid fa-file-lines"></i>
                    <div>
                        <b>{{ $post['attachment_title'] }}</b>
                        <small>{{ $post['attachment_sub'] }}</small>
                    </div>
                    <i class="fa-solid fa-arrow-up-right-from-square p-dl"></i>
                </div>
                @endif

                @if ($post['insight'])
                <div class="p-insight">
                    <span class="p-insight-icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </span>
                    <div>
                        <b>Explore Company Insights</b>
                        <small>Salaries, reviews, and more.</small>
                        <div>
                            <a class="c-btn p-insight-btn" href="#">
                                View Insights
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                <div class="p-stats">
                    <span>
                        <i class="fa-solid fa-heart"></i>
                        {{ $post['likes'] }}
                    </span>
                    <span>
                        <i class="fa-regular fa-comment"></i>
                        {{ $post['comments'] }}
                    </span>
                    <span>
                        <i class="fa-solid fa-share-nodes"></i>
                        Share
                    </span>
                </div>

                <div class="p-actions">
                    <button class="p-act">
                        <i class="fa-solid fa-thumbs-up"></i>
                        Like
                    </button>
                    <button class="p-act">
                        <i class="fa-regular fa-comment"></i>
                        Comment
                    </button>
                    <button class="p-act">
                        <i class="fa-solid fa-share"></i>
                        Share
                    </button>
                </div>
            </div>
        </article>
        @endforeach

        <div class="p-foot-bar">
            <span>Showing 1 to 4 of 128 posts</span>
            <div class="p-pages">
                <a class="p-page" href="#"><i class="fa-solid fa-chevron-left"></i></a>
                <a class="p-page active" href="#">1</a>
                <a class="p-page" href="#">2</a>
                <a class="p-page" href="#">3</a>
                <span class="p-page-dots">...</span>
                <a class="p-page" href="#">32</a>
                <a class="p-page" href="#"><i class="fa-solid fa-chevron-right"></i></a>
            </div>
            <span class="p-per">
                Posts per page
                <button class="c-drop c-drop-sm">
                    4
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
            </span>
        </div>

        <div class="p-panel-foot">
            <span>© 2024 Wazify. All rights reserved.</span>
            <span>
                <i class="fa-solid fa-shield-halved"></i>
                Admin Guidelines
                |
                Contact Support
            </span>
        </div>
    </div>
</div>
@endsection
