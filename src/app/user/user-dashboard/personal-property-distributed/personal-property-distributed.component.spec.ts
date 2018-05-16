import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PersonalPropertyDistributedComponent } from './personal-property-distributed.component';

describe('PersonalPropertyDistributedComponent', () => {
  let component: PersonalPropertyDistributedComponent;
  let fixture: ComponentFixture<PersonalPropertyDistributedComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PersonalPropertyDistributedComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PersonalPropertyDistributedComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
