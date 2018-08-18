<template>
	<el-container class="top-container">
		<el-header>
			<img src="/admin/images/common/logo.png" class="logo">
		</el-header>
		<el-container>
			<el-aside width="200px">
				<el-menu
					default-active="2"
					class="el-menu-vertical-demo"
					@open="handleOpen"
					@close="handleClose"
					background-color="#545c64"
					text-color="#fff"
					active-text-color="#ffd04b">
					<el-submenu index="1">
						<template slot="title">
							<i class="el-icon-setting"></i>
							<span>系统</span>
						</template>
						<el-menu-item index="1-1">权限</el-menu-item>
						<el-menu-item index="1-2">角色</el-menu-item>
						<el-menu-item index="1-3">用户</el-menu-item>
						<el-menu-item index="1-4">菜单</el-menu-item>
					</el-submenu>
					<el-submenu index="2">
						<template slot="title">
							<i class="el-icon-star-off"></i>
							<span>竞价</span>
						</template>
						<el-menu-item index="2-1">报表</el-menu-item>
					</el-submenu>
					<el-submenu index="3">
						<template slot="title">
							<i class="el-icon-phone-outline"></i>
							<span>电商</span>
						</template>
						<el-menu-item index="3-1">报表</el-menu-item>
					</el-submenu>
				</el-menu>
			</el-aside>
			<el-container>
				<el-header>Header</el-header>
				<el-main>Main</el-main>
				<el-footer>Footer</el-footer>
			</el-container>
		</el-container>
	</el-container>
</template>

<script>
	export default {
		data () {
			return {
				
			}
		},
		methods: {
			handleOpen(key, keyPath) {
				console.log(key, keyPath);
			},
			handleClose(key, keyPath) {
				console.log(key, keyPath);
			}
		}
	}
</script>
