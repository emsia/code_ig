<div class="span3">
	<div class="todo">
		<ul>			
			<li <?php if (  !empty($active_nav) && $active_nav == 'DASHBOARD' ){?>class="todo-done" <?php } ?> >
				<a style="text-decoration: none" href="{% url 'classes:dashboard' %}">
					<div class="todo-icon fui-cmd"></div>
					<div class="todo-content">
						<h4 class="todo-name">
							WORK COMPETENCY
						</h4>	
					</div>
				</a>
			</li>

			<li <?php if (   !empty($active_nav) && $active_nav == 'CLASSES'){ ?> class="todo-done" <?php }?>>
				<a style="text-decoration: none" href="{% url 'classes:classes' %}">
					
					<div class="todo-content">
						<div class="todo-icon fui-lock"></div>
						<h4 class="todo-name">
							BEHAVIORAL COMPETENCY
						</h4>
					</div>
				</a>
			</li>

			<li <?php if(   !empty($active_nav) && $active_nav ==  'EXAMS'){ ?>class="todo-done" <?php }?> >
				<a style="text-decoration: none" href="{% url 'essays:list' %}">
					<div class="todo-content">
					<div class="todo-icon fui-location"></div>
						<h4 class="todo-name">
							COMMENTS *
						</h4>
					</div>
				</a>
			</li>
		</ul>
	</div>
</div>