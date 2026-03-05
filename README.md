# 🎓 Laravel API Projects - Activities 1, 2, 3 & 4

---

## 📌 ACTIVITY 4: Authorization with Spatie Laravel Permissions

A role-based authorization system built on top of Activity 3, implementing **Spatie Laravel Permissions** with Policies and Gates to control access to student resources.

### ✨ New Features (Activity 4)
- ✅ **Role-based access control** (Admin, Editor, No Role)
- ✅ **Permissions system** (`view students`, `create students`, `edit students`, `delete students`)
- ✅ **Policy-based authorization** for Student model
- ✅ **Gate integration** with Laravel's native authorization
- ✅ **Role assignment** via seeder
- ✅ **403 Forbidden responses** for unauthorized actions

### 🔧 Technologies Added
| Technology | Purpose |
|------------|---------|
| 🔐 Spatie Laravel Permissions v7.2 | Role & Permission Management |
| 🛡️ Laravel Policies | Model-specific authorization |
| 🚦 Laravel Gates | Authorization logic |

---

### 📋 Authorization Matrix

| User Role | View Students | Create Student | Edit Student | Delete Student |
|-----------|--------------|----------------|--------------|----------------|
| 👑 Admin | ✅ ALLOWED | ✅ ALLOWED | ✅ ALLOWED | ✅ ALLOWED |
| ✏️ Editor | ✅ ALLOWED | ❌ DENIED | ✅ ALLOWED | ❌ DENIED |
| 👤 No Role | ❌ DENIED | ❌ DENIED | ❌ DENIED | ❌ DENIED |

---

### 🧪 Activity 4 — ThunderClient Testing Screenshots

#### 1. 👑 Admin User Testing (Full Access)

**GET All Students - Admin**
<p align="center">
  <img src="./asset/image/screenshot/activity4/admin-get-students.png" alt="Admin GET Students" width="80%" />
</p>
<p align="center">
  <em>✅ Admin can view all students (200 OK)</em>
</p>

---

**CREATE Student - Admin**
<p align="center">
  <img src="./asset/image/screenshot/activity4/admin-create-student.png" alt="Admin Create Student" width="80%" />
</p>
<p align="center">
  <em>✅ Admin can create new student (201 Created)</em>
</p>

---

**UPDATE Student - Admin**
<p align="center">
  <img src="./asset/image/screenshot/activity4/admin-update-student.png" alt="Admin Update Student" width="80%" />
</p>
<p align="center">
  <em>✅ Admin can update student (200 OK)</em>
</p>

---

**DELETE Student - Admin**
<p align="center">
  <img src="./asset/image/screenshot/activity4/admin-delete-student.png" alt="Admin Delete Student" width="80%" />
</p>
<p align="center">
  <em>✅ Admin can delete student (200 OK)</em>
</p>

---

#### 2. ✏️ Editor User Testing (Limited Access)

**GET All Students - Editor**
<p align="center">
  <img src="./asset/image/screenshot/activity4/editor-get-students.png" alt="Editor GET Students" width="80%" />
</p>
<p align="center">
  <em>✅ Editor can view all students (200 OK)</em>
</p>

---

**CREATE Student - Editor (FAIL)**
<p align="center">
  <img src="./asset/image/screenshot/activity4/editor-create-fail.png" alt="Editor Create Fail" width="80%" />
</p>
<p align="center">
  <em>❌ Editor cannot create student - 403 Forbidden</em>
</p>

---

**UPDATE Student - Editor**
<p align="center">
  <img src="./asset/image/screenshot/activity4/editor-update-student.png" alt="Editor Update Student" width="80%" />
</p>
<p align="center">
  <em>✅ Editor can update student (200 OK)</em>
</p>

---

**DELETE Student - Editor (FAIL)**
<p align="center">
  <img src="./asset/image/screenshot/activity4/editor-delete-fail.png" alt="Editor Delete Fail" width="80%" />
</p>
<p align="center">
  <em>❌ Editor cannot delete student - 403 Forbidden</em>
</p>

---

#### 3. 👤 No Role User Testing (No Access)

**GET All Students - No Role (FAIL)**
<p align="center">
  <img src="./asset/image/screenshot/activity4/norole-get-fail.png" alt="No Role GET Fail" width="80%" />
</p>
<p align="center">
  <em>❌ User with no role cannot view students - 403 Forbidden</em>
</p>

---

**CREATE Student - No Role (FAIL)**
<p align="center">
  <img src="./asset/image/screenshot/activity4/norole-create-fail.png" alt="No Role Create Fail" width="80%" />
</p>
<p align="center">
  <em>❌ User with no role cannot create student - 403 Forbidden</em>
</p>

---

#### 4. 🗄️ Database Setup Proof

**Permission Tables**
<p align="center">
  <img src="./asset/image/screenshot/activity4/database-tables.png" alt="Database Tables" width="80%" />
</p>
<p align="center">
  <em>✅ Spatie permission tables created successfully</em>
</p>

---

**Roles & Permissions Seeder**
<p align="center">
  <img src="./asset/image/screenshot/activity4/seeder-run.png" alt="Seeder Run" width="80%" />
</p>
<p align="center">
  <em>✅ Roles and permissions seeded successfully</em>
</p>

---

## 📌 ACTIVITY 3: Laravel Sanctum Authentication API

A fully functional **Authentication API** built with Laravel Sanctum featuring token-based authentication with register, login, logout, and protected routes.

### ✨ Features
- ✅ User registration with name, email, password
- ✅ User login with token generation
- ✅ Protected routes using Bearer tokens
- ✅ Get authenticated user data
- ✅ Logout (token invalidation)
- ✅ SQLite database for data persistence

### 🔧 Technologies Used
| Technology | Purpose |
|------------|---------|
| 🧱 Laravel 12 | PHP Framework |
| 🔐 Laravel Sanctum | Authentication |
| 🗄️ SQLite | Database |
| ⚡ ThunderClient | API Testing |

---

### 📋 Authentication Endpoints

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| POST | `/api/register` | Register new user | ❌ No |
| POST | `/api/login` | Login & get token | ❌ No |
| GET | `/api/user` | Get authenticated user | ✅ Yes |
| POST | `/api/logout` | Logout & delete token | ✅ Yes |
| GET | `/api/students` | Get all students (protected) | ✅ Yes |
| POST | `/api/students` | Create new student (protected) | ✅ Yes |
| GET | `/api/students/{id}` | Get single student (protected) | ✅ Yes |
| PUT | `/api/students/{id}` | Update student (protected) | ✅ Yes |
| DELETE | `/api/students/{id}` | Delete student (protected) | ✅ Yes |

---

### 🧪 Activity 3 — ThunderClient Testing Screenshots

#### 1. 📝 Register Endpoint
**POST** `http://127.0.0.1:8000/api/register`
<p align="center">
  <img src="./asset/image/screenshot/activity3/thunderclient-register.png" alt="Register Endpoint" width="80%" />
</p>
<p align="center">
  <em>✅ User registration with name, email, and password</em>
</p>

---

#### 2. 🔑 Login Endpoint
**POST** `http://127.0.0.1:8000/api/login`
<p align="center">
  <img src="./asset/image/screenshot/activity3/thunderclient-login.png" alt="Login Endpoint" width="80%" />
</p>
<p align="center">
  <em>✅ Login returns user data and Bearer token</em>
</p>

---

#### 3. 👤 Get User Endpoint (Protected)
**GET** `http://127.0.0.1:8000/api/user`  
**Headers:** `Authorization: Bearer {token}`
<p align="center">
  <img src="./asset/image/screenshot/activity3/thunderclient-getuser.png" alt="Get User Endpoint" width="80%" />
</p>
<p align="center">
  <em>✅ Get authenticated user data using Bearer token</em>
</p>

---

#### 4. 🚪 Logout Endpoint
**POST** `http://127.0.0.1:8000/api/logout`  
**Headers:** `Authorization: Bearer {token}`
<p align="center">
  <img src="./asset/image/screenshot/activity3/thunderclient-logout.png" alt="Logout Endpoint" width="80%" />
</p>
<p align="center">
  <em>✅ Logout invalidates the token</em>
</p>

---

## 📌 ACTIVITY 2: Student CRUD API (Legacy)

A fully functional **RESTful API** built with Laravel that performs CRUD operations on student records featuring biblical names.

### 📋 API Endpoints (Activity 2)

| Method | Endpoint | Description |
|--------|----------|-------------|
| ✅ GET | `/api/test` | Test API connection |
| ✅ POST | `/api/students` | Create new student |
| ✅ GET | `/api/students` | Get all students |
| ✅ GET | `/api/students/{id}` | Get single student |
| ✅ PUT | `/api/students/{id}` | Update student |
| ✅ DELETE | `/api/students/{id}` | Delete student |

### 🧪 Activity 2 — ThunderClient Testing Screenshot

**GET All Students**
<p align="center">
  <img src="./asset/image/screenshot/activity2/thunderclient-students.png" alt="Student CRUD" width="80%" />
</p>
<p align="center">
  <em>✅ GET /api/students - Successfully retrieved all student records</em>
</p>

---

## 📌 ACTIVITY 1: Basic Laravel Setup (Not Included)

---

## 👨‍💻 Author

**Alther Liga**  
📧 Email: altherliga@gmail.com  
📁 Repository: [Liga-Activity-4-Authorization-with-Spatie-Laravel-Permissions](https://github.com/melody-sheep/Liga-Activity-4-Authorization-with-Spatie-Laravel-Permissions.git)

---

## 📅 Completion Date
**March 5, 2026**

---

## 📝 License
This project is licensed under the MIT License.