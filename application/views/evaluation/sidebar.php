<div class="span3">
	<div class="col-md-4">
	<div class="todo">
		<ul>
			<li>
                <div class="todo-icon fui-list"></div>
                <div class="todo-content">
                  <h4 class="todo-name">
                    Chat with <strong>V.Kudinov</strong>
                  </h4>
                  Skype conference an 9 am
                </div>
              </li>
			  <?php $active_nav = 'DASHBOARD'?>
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
					<div class="todo-icon fui-lock"></div>
					<div class="todo-content">
						<h4 class="todo-name">
							BEHAVIORAL COMPETENCY
						</h4>
					</div>
				</a>
			</li>

			<li <?php if(   !empty($active_nav) && $active_nav ==  'EXAMS'){ ?>class="todo-done" <?php }?> >
				<a style="text-decoration: none" href="{% url 'essays:list' %}">
					<div class="sidebar-icon fui-location"></div>
					<div class="todo-content">
						<h4 class="todo-name">
							COMMENTS *
						</h4>
					</div>
				</a>
			</li>
		</ul>
	</div>
	</div>
</div>