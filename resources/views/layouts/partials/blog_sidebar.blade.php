<div class="sidebar" id="sidebar">
	<section class="box">
		<form>
			search here
		</form>
	</section>
	<section class="box">
		<h5 class="text-uppercase">Categories</h5>
		<ul>
			@foreach($categories as $category)
				<li>
					@if($category->parent_id > 0)
						&nbsp;
					@endif{{----}}
					<a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
				</li>
			@endforeach
		</ul>
	</section>
	<section class="box tags">
		<h5 class="text-uppercase">Tags</h5>
			@foreach($tags as $tag)
				<span class="tag">
					<a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
				</span>
			@endforeach
	</section>
</div>