<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">
        <aside class="widget news-letter">
            <h3 class="widget-title text-uppercase text-center">Search</h3>

            <form action="/search" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Task name">
                <input type="submit" value="Search" class="text-uppercase text-center btn btn-subscribe">
            </form>

        </aside>
    </div>
</div>
